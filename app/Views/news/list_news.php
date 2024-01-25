<!-- File: app/Views/admin/list_news.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of News</title>
    <style>
        table {
            width: 10%;
            border-collapse: collapse;
            margin-top: 60px;
            margin-left: 100px;
        }
        
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #fdca00;
        }

        #action-btn {
            padding: 8px;
            background-color: #000000;
            color: #fff;
            cursor: pointer;
        }

        #action-btn:hover {
            background-color: #fdca00;
        }
        #add-news-btn{
            padding: 5px;
            background-color: #fdca00;
            color: #fff;
            cursor: pointer;
        }
        #add-news-btn:hover {
            background-color: #000000;
        }
        #toggle-btn{
            padding: 8px;
            background-color: #000000;
            color: #fff;
            cursor: pointer;
        }
        .btn-group, .btn-group-vertical {
            position: relative;
            display: inline-block;
            vertical-align: middle;
        }
        .btn-group>.btn:first-child:not(:last-child):not(.dropdown-toggle) {
             border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .btn-group.open .dropdown-toggle {
            -webkit-box-shadow: inset 0 3px 5px rgba(0,0,0,.125);
            box-shadow: inset 0 3px 5px rgba(0,0,0,.125);
        }
        .btn-group>.btn+.dropdown-toggle {
            padding-right: 8px;
            padding-left: 8px;
        }
        .btn .caret {
            margin-left: 0;
        }
        .caret {
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: 2px;
            vertical-align: middle;
            border-top: 4px dashed;
            border-right: 4px solid transparent;
            border-left: 4px solid transparent;
        }
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0,0,0,0);
            border: 0;
        }
        .dropdown-menu {
            box-shadow: none;
            border-color: #eee;
        }
        .dropdown-menu>li>a {
            color: #777;
        }
        .dropdown-menu>li>a {
            display: block;
            padding: 3px 20px;
            clear: both;
            font-weight: 400;
            line-height: 1.42857143;
            color: #333;
            white-space: nowrap;
        }
        li {
            display: list-item;
            text-align: -webkit-match-parent;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
    <h1>List of News</h1>
    <button id="add-news-btn" ><a href="<?= site_url('admin/add') ?>">Add News</a></button>

    <?php if (!empty($news)): ?>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Image</th>
                    <!-- Add more headers as needed -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($news as $item): ?>
                    <tr>
                        <td><?= esc($item['title']) ?></td>
                        <td><?= esc($item['content']) ?></td>
                        <td><?= esc($item['date']) ?></td>
                        <td>
                <?php if (!empty($item['image'])): ?>
                        <img src="<?= base_url('path/to/upload/directory/' . $item['image']) ?>" alt="Image" style="max-width: 100px; max-height: 100px;">
                    <?php else: ?>
                    No Image
                <?php endif; ?>
                </td>
                        <td><div class="btn-group">
                            <button type="button" id="action-btn" class="btn btn-info">Action</button>
                            <button type="button" class="btn btn-info dropdown-toggle" id="toggle-btn" data-toggle="dropdown" aria-expanded="true">
                               <span class="caret"></span>
                               <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= site_url('admin/viewnews/' . $item['id']) ?>">View</a></li>
                                <li><a href="<?= site_url('admin/editnews/' . $item['id']) ?>">Edit</a></li>
                                <li><a href="javascript:void(0);" onclick="deleteConfirm(<?= $item['id'] ?>)">Delete</a></li>
                            </ul>
                        </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No news available.</p>
    <?php endif; ?>
    <script>
    function deleteConfirm(newsId) {
        // You can implement your confirmation logic here
        var confirmDelete = confirm('Are you sure you want to delete this news?');
        if (confirmDelete) {
            // You can perform the deletion action here
            // For example, redirect to a delete method in the controller
            window.location.href = '<?= site_url('admin/deletenews/') ?>' + newsId;
        }
    }
</script>
</body>
</html>
