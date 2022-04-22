$(document).ready(function()
{
  $('#product').on('change', function()
    {
      var id = $('#product').val();
      $('#product_id').val(id);
      $.get("/product/" + event.target.value + "", function(response, product)
      {
        $('#description').val(response[0].description);
        var weight = $('#weight').val();
        var value = parseFloat(response[0].value).toFixed(2);
        $('#value').val(weight*value);
        $('#stock').val(response[0].stock);
      });
  });

  $('#weight').on('change', function()
  {
    var id = $('#product').val();
    $('#product_id').val(id);
    $.get("/product/" + id + "", function(response, product)
    {
      var weight = $('#weight').val();
      var value = parseFloat(response[0].value).toFixed(2);
      $('#value').val(weight*value);
    });
  });
});