<div class="search">
    <form id="register" action="register" method="post">
        <input type="text" placeholder="Search anything..." name="search" required><br>
        <input type="submit" value="Search" name="submit">
    </form>
    <div class="result">
        <?php if (isset ($info)) {
            echo $info;}
        ?>
    </div>
</div>