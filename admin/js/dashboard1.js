
$(function() {
 //  ##########################
  var Area_chart = Morris.Area({
    element: 'Area_chart',
    behaveLikeLine: true,
    parseTime : true,
    data: [ ],
    xkey: 'day',
    xLabels: 'day',
    ykeys: ['a', 'b', 'c'],
    labels: ['Biaya', 'Pendapatan', 'Laba'],
    pointSize: 3,
    fillOpacity: 0,
    pointStrokeColors:['#00bfc7', '#fb9678', '#9675ce'],
    gridLineColor: '#e0e0e0',
    lineWidth: 3,
    hideHover: 'auto',
    lineColors: ['#00bfc7', '#fb9678', '#9675ce'],
    resize: true
  });

  $("#SalesPeriods").on("change", function(){
   var selectedID = $(this).val();
   $.ajax({
          type: "POST",
          url: "ajax.php?Area_chart="+selectedID,
          data: 0,
          dataType: 'json',
          success: function(data){
            console.log(data);
            Area_chart.setData(data);
            $('.flash').show();
            //setCookie('numbers',data,3);
            $('.flash').html("Template Updated")
          }
        });
      });
});
 $(document).ready(function(e){
    $("#SalesPeriods").trigger("change");
});
