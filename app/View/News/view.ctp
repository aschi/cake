<div class="news">
    <span class="newsDate"><?php echo date('d.m.Y', strtotime($news['News']['modified'])); ?></span>
    <h1><?php echo h($news['News']['title']); ?></h1>
        <p><?php echo $news['News']['newstext']; ?></p>	
</div>
