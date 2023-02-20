      <div id="footer" class="p-3 mb-2 bg-primary text-white fixed-bottom">
        <p class="text-center">Copyright &copy; - IT Conference Attendance System <?php echo date('Y'); ?></p>
      </div>
    </div><!-- container -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
      $( function() {
        $( "#dob" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "-100:+0",
      dateFormat: "yy-mm-dd"
    });
      } );
    </script>
  </body>
</html>