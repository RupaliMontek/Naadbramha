<!-- File: app/Views/admin/view_news.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View News</title>
    <style>
        
        </style>
</head>
<body>
<label for="title">Title:</label>
    <input type="text" name="title" id="title" value="<?= esc($news['title']) ?>" readonly><br>

    <label for="date">Date:</label>
    <input type="date" name="date" id="date" value="<?= esc($news['date']) ?>" readonly><br>

    <label for="content">Content:</label>
    <textarea name="content" id="content" rows="16" readonly><?= esc($news['content']) ?></textarea><br>

    <label for="image">Image:</label>
<img src="<?= base_url('path/to/upload/directory/' . esc($news['image'])) ?>" alt="Current Image" style="max-width: 300px;"><br>

    <button><a href="<?= site_url('admin/listNews') ?>">Back</a></button>
</body>
</html>
