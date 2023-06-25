    
    <footer class="text-muted py-5" style="font-size: 20px">
        <div class="container-fluid" style="display: flex">
            <p style="margin-left:10px">
                &copy; 2022 Company, Inc. &middot; 
                <a href="#">Privacy</a> &middot;
                <a href="#" style="margin-right: 1000px">Terms</a>
            </p>
            <p class="float-end mb-1">
                <a href="#" style="margin-left: 80px">Back to top</a>
            </p>
        </div>
    </footer>
</body>
    <script>
        var MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px";

        function menutoggle(){
            if(MenuItems.style.maxHeight == "0px")
            {
                MenuItems.style.maxHeight = "200px";
            }
            else
            {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>
</html>