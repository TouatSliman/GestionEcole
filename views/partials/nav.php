<nav class="nav printer">
    <form action="./" method="get">
        <input type="number" name="ID" id="" placeholder="<?php if (isset($obj)) echo "ID of " . $obj;
                                                            else echo "can't update or delete" ?>">
        <input type="submit" class="buttonOrange" value="Update" formaction="./update<?= $obj ?>">
        <input type="submit" class="buttonRed" value="Delete" formaction="./delete<?= $obj ?>">
    </form>
    <i class="fas fa-bars buttonMenu"></i>
    <ul>
        <i class="fas fa-times buttonMenu"></i>
        <li><a href="./">Home</a></li>
        <li><a href="./student">Student</a></li>
        <li><a href="./teacher">Teacher</a></li>
        <li><a href="./module">Module</a></li>
        <li><a href="./tables">Tables</a></li>
        <li><a href="./bulletin">bulletin des notes</a></li>
        <li><a href="./pv">PV</a></li>
        <li><a href="./statistique">Statistique</a></li>
    </ul>

</nav>
<script>
    const buttonMenu = document.getElementsByClassName("buttonMenu");
    buttonMenu[0].addEventListener("click", function() {
        document.querySelector("nav ul").classList.toggle("active");
        document.querySelector("nav ul").style.display = "block";
    })
    buttonMenu[1].addEventListener("click", function() {
        document.querySelector("nav ul").classList.toggle("active");
        document.querySelector("nav ul").style.display = "none";
    })
</script>
<script
src="https://kit.fontawesome.com/2610c4262a.js"
crossorigin="anonymous"
></script>