<h2>Lista de archivos</h2>
    <a class="btn btn-primary" href="<?php echo "/NewsController/create"?>">Create</a>
<table class="table">
    <tr>
        <th>title</th>
        <th>slug</th>
    </tr>
    <?php if(!empty($news)): ?>
        <?php foreach($news as $item ): ?>
            <tr>
                <td>
                    <a href="<?php echo "/NewsController/view/".$item['id']?>"><?php echo $item['title']?></a>
                </td>
                <td>
                    <a href="<?php echo "/NewsController/edit/".$item['id']?>">Edit </a>
                    <a href="<?php echo "/NewsController/delete/".$item['id']?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>    
    <?php endif; ?>
</table>