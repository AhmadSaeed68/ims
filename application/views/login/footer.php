   
<!-- Footer -->
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer" style="background-image: url(http://papers.co/wallpaper/papers.co-mt42-starry-night-sky-star-galaxy-space-white-grey-35-3840x2160-4k-wallpaper.jpg);">
    <div class="w3-row-padding">
      <div class="w3-col s4">
        <h4>Contact</h4>
        <p>Questions? Go ahead.</p>
        <form action="/action_page.php" target="_blank">
          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
          <button type="submit" class="w3-button w3-block w3-black">Send</button>
        </form>
      </div>

      <div class="w3-col s4">
        <h4>About</h4>
        <p><a href="#">About us</a></p>
        <p><a href="#">We're hiring</a></p>
        <p><a href="#">Support</a></p>
        <p><a href="#">Find store</a></p>
        <p><a href="#">Shipment</a></p>
        <p><a href="#">Payment</a></p>
        <p><a href="#">Gift card</a></p>
        <p><a href="#">Return</a></p>
        <p><a href="#">Help</a></p>
      </div>

      <div class="w3-col s4 w3-justify">
        <h4>Store</h4>
        <p><i class="fa fa-fw fa-map-marker"></i> Company Name</p>
        <p><i class="fa fa-fw fa-phone"></i> 0044123123</p>
        <p><i class="fa fa-fw fa-envelope"></i> ex@mail.com</p>
        <h4>We accept</h4>
        <p><i class="fa fa-fw fa-cc-amex"></i> Amex</p>
        <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
        <br>
        <i class="w3-text-teal fa fa-facebook-official w3-hover-opacity w3-large"></i>
        <i class="w3-text-red fa fa-instagram w3-hover-opacity w3-large"></i>
        <i class="w3-text-yellow fa fa-snapchat w3-hover-opacity w3-large"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
        <i class="w3-text-blue fa fa-twitter w3-hover-opacity w3-large"></i>
        <i class="w3-text-blue fa fa-linkedin w3-hover-opacity w3-large"></i>
      </div>
    </div>
  </footer>
        <script type="text/javascript" src="<?= base_url('asset/js/jquery.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('asset/js/dataTables.bootstrap4.js')?>"></script>



        <script type="text/javascript" src="<?=  base_url('asset/js/bootstrap.min.js')?>"></script>
        <script type="text/javascript">
        	
        	var color=["#222f3e","#f368","#ffffff",""];
var i=0;
document.querySelector("#bg_change").addEventListener("click",function(){
  i=i<color.length ? ++i :0;
  document.querySelector("body").style.background=color[i]
});

function changeBodyBg(color){
        document.body.style.background = color;
    }
        </script>
         </body>
</html>