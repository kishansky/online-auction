</div>
</div>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>

  AOS.init();
  let data = [];
  data.push("Search");
  <?php
  $sqltype = "SELECT * FROM product_type ";
  $resulttype = mysqli_query($conn, $sqltype);
  if (mysqli_num_rows($resulttype) > 0) {
    while ($rowtype = mysqli_fetch_assoc($resulttype)) {
  ?>
      data.push('<?php echo ucfirst($rowtype['type']); ?>');
  <?php
    }
  }else{
    echo "console.log('error');";
  }
  ?>
  // console.log(data);
  let l = 0;
  function loop() {
    document.getElementById('search').placeholder = data[l];
    if (l == data.length - 1) {
      l = 0
    } else {
      l = l + 1;
    }
  }
  setInterval(loop, 4000);

  function search(){
    let search = document.getElementById('search');
    let searchvalue = search.value;
    window.location.href=`index.php?search=${searchvalue}`;
  }
  // console.log(a);
</script>
</body>

</html>
<?php
mysqli_close($conn);
?>