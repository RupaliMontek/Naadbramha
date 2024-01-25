<!-- File: app/Views/admin/add_news.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.tiny.cloud/1/bqpg1i47n6cdlqccyer835q7nirw6kmgegc9yyprprxowv19/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content1',
            height: 300,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script>
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
        #content1
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
            width: 90px;
            padding: 8px;
            margin-bottom: 16px;
            margin-left: 90%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fdca00;
            color: #fff;
            cursor: pointer;

        }
        .mce-tinymce {
            margin-top: 10px;
        }
        button:hover {
            background-color: #000000;
        }
    </style>
</head>
<body>
    <!-- <h1>Add News</h1> -->
    <form action="<?= site_url('admin/save_news') ?>" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br>

        <label for="date">Date:</label>
        <input type="date" name="date" id="date" required><br>

        <label for="content">Content:</label>
        <textarea name="content" id="content1" rows="16" ></textarea><br>

        <label for="image">Image:</label>
        <input type="file" name="image" id="image" accept="image/*" required><br>

        <button type="submit">Save</button>
    </form>
    <script>
        function validateForm() {
            // Check if TinyMCE content is not empty
            if (tinymce.get('content1').getContent().trim() !== '') {
                // Submit the form if validation passes
                document.getElementById('newsForm').submit();
            } else {
                // Handle validation error (e.g., show an alert)
                alert('Content cannot be empty');
            }
        }
    </script>
</body>
</html>
