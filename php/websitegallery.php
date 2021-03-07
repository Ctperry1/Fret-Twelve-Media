<?php

if (isset($_POST['submit'])) {
    $newFileName = $_POST['filename'];
    if (empty($_POST['filename'])) {
        $newFileName = "gallery";
    } else {
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }
    $imageTitle = $_POST['filetitle'];
    $imageDescription = $_POST['filedescription'];

    $file = $_FILES['file'];

    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpeg", "png");

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 200000) {
                $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
                $fileDestination = "../assets/images/gallery/" . $imageFullName;

                include_once("./insert.php");

                if (empty($imageTitle) || ($imageDescription)) {
                    header("Location: ./insertIndex.php?upload=empty");
                    exit();
                } else {
                    $sql = "SELECT * FROM sites;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL Statement failed.";
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_num_rows($result);
                        $setImageOrder = $rowCount + 1;

                        $sql = "INSERT INTO sites (title, descrip, imgFullName, orderGallery) VALUES 
                        (?, ?, ?, ?);";
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "SQL Statement failed.";
                        } else {
                            mysqli_stmt_bind_param(
                                $stmt,
                                "ssss",
                                $imageTitle,
                                $imageDescription,
                                $imageFullName,
                                $setImageOrder
                            );
                            mysqli_stmt_execute($stmt);

                            move_uploaded_file($fileTempName, $fileDestination);
                            header("Location: ./insertIndex.php?upload=success");
                        }
                    }
                }
            } else {
                echo "File size is too big.";
                exit();
            }
        } else {
            echo "You had an error.";
            exit();
        }
    } else {
        echo "You need to upload a proper file type.";
        exit();
    }
}
