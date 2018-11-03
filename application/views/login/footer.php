   

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