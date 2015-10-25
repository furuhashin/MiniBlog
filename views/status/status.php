<div id="statuses">
    <?php foreach($statuses as $status): ?><!--$statusesはStatusControllerクラスで生成される-->
    <div class="status">
        <div class="status_content">
            <?php echo $this->escape($status['user_name']); ?>
            <?php echo $this->escape($status['body']); ?>
        </DIV>
        <div>
            <?php echo $this->escape($status['created_at']); ?>
        </div>
    </div>