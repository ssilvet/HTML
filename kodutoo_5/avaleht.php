<div class="row justify-content-center">
    <div class="col-md-8 text-start">
        <?php if (!empty($posts)): ?>
            <div class="list-group">
                <?php foreach ($posts as $post): ?>
                    <div class="list-group-item" style="border: none;">
                        <h3 class="mb-1"><strong><?= htmlspecialchars($post[0]) ?></strong></h3>
                        <p class="mb-1"><?= htmlspecialchars($post[1]) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Ei ole postitusi.</p> 
        <?php endif; ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-8 d-flex justify-content-end mt-4">
        <a href="index.php?page=404" class="btn btn-primary">Vanemad postitused</a>
    </div>
</div>
