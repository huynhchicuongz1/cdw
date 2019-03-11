
$(document).ready(function () {
    $('#return_fl').hide();
    $('#btn-search').on('click',function (e) {
        //e.preventDefault()
        var from = $('#from option:selected').val();
        var to = $('#to option:selected').val();
        var departure = $('#departure-date').val()
        var flight_type = $("input[name='flight_type']:checked").val();
        var return_date = $('#return_date').val();
        var flight_class = $('#flight-class').val();
        var total_person = $('#total-person').val();
        //console.log(`${from} ${to} ${departure} ${flight_type} ${return_date} ${flight_class} ${total_person} `)
        if (from  && to  && departure  && flight_type   && flight_class  && total_person){

            if (from == to){
                alert("Trùng địa điểm");
            }
            else{
               
                $('#search-form').submit();
            }

        }
        else
        {
            alert("Thiếu thông tin");
        }
    })
    $( "#rd_return" ).on( "click", function() {
        $('#return_fl').show();
      });
      $( "#rd_oneway" ).on( "click", function() {
        $('#return_fl').hide();
      });


})