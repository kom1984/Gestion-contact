<div class="container">
    <footer class="mt-4 pt-4 border-top">
        <div class="row">
            <div class="col-12 col-md">
                <h5>Gérer facilement mes contacts !</h5>
                <small class="d-block text-muted">
                    &copy; 2023
                </small>
            </div>
            <div class="col-6 col-md">
                <h5>En Plus</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-muted">Mentions Légales</a></li>
                    <li><a href="#" class="text-muted">Confidentialité</a></li>
                    <li><a href="#" class="text-muted">Plan du Site</a></li>
                </ul>
            </div>
        </div>
    </footer>
</div>

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    // https://datatables.net/
    $(document).ready(function () {
        let table = new DataTable('#contactTable');
    });
</script>
<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
</body>

</html>