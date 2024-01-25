<!-- File: app/Views/admin/edit_news.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }
       
        h1 {
            text-align: center;
            color: #4723d9;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%; 
            height: 200%;
            max-width: 1300px; 
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        /* input,
        textarea
         {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        } */
        #date{
            width: 130px;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #title
        {
            width: 80%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #content
        {
            width: 80%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #imageUpload{
            width: 230px;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        /* #previewImage {
            max-width: 100%;
            height: auto;
            margin-bottom: 16px;
            display: none;
        } */
        button {
            width: 100px;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #4723d9;
            color: #fff;
            cursor: pointer;

        }

        button:hover {
            background-color: #7723d9;
        }
    </style>
    <!-- Add your styles if needed -->
</head>
<body>
    <h1>Edit News</h1>
    <form action="<?= site_url('admin/updateNews/' . $news['id']) ?>" method="post" enctype="multipart/form-data">
        <!-- Add form fields with pre-filled values from $news -->
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?= esc($news['title']) ?>" required><br>

        <label for="date">Date:</label>
        <input type="date" name="date" id="date" value="<?= esc($news['date']) ?>" required><br>

        <label for="content">Content:</label>
        <textarea name="content" id="content" rows="4" required><?= esc($news['content']) ?></textarea><br>

        <label for="image">Image:</label>
        <input type="file" name="image" id="image" accept="image/*"><br>

        <p><button type="submit">Update News</button>
    </form>
</body>
</html>
