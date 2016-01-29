
<!-- <script type="text/javascript" src="{{ Asset('jquery-ui/jquery-ui.min.js') }}"></script> -->
<link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.theme.css') }}" />
<script type="text/javascript" src="{{ Asset('json2/json2.js') }}"></script>
<!-- jQuery UI 1.11.2 -->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {

    var holdData = [];
    var datasearch = [];
    var dataChange = [];
    var time = {};
    time.month = {{ $month }};
    time.year = {{ $year }};


    function AppItem (id,nid,data) {
        this.idem = id;
        this.idday = nid;
        this.data = data;
    }

    function contructData()
    {
      holdData = [];
      $('.content-calendar .item').each(function(key,value)
      {
         var idem = $(value).attr('idem')
         var idday = $(value).attr('idday');
         var data = $(value).text();
         var item = new AppItem(idem,idday,data);
         holdData.push(item);
      });
    }

    function pullDataCalendar()
    {
      var allhtml = '<tr class="itemblank"><td><div class="innerblank"></div></td></tr>';
      $.each(datasearch,function(kds,idem)
      {
        var htmlrow = '<tr>';
        $.each(holdData,function(key,value){
            if(value.idem == idem)
            {
              htmlrow += '<td><div class="item" idem="'+idem+'" idday="'+value.idday+'" >'+value.data+'</div></td>';
            }
        });
        htmlrow += '</tr>';
        allhtml += htmlrow;
      });
      $('.content-calendar table tbody').html(allhtml);
    }

    function setData(idem,idday,data)
    {
      $.each(holdData,function(khD,vhD)
      {
         if(vhD.idem == idem && vhD.idday == idday)
          {
            holdData[khD].data = data;
          }
      });
    }

    function refreshCalendarWhenChoose(month,year)
    {
      time.month = month;
      time.year = year;

      $.ajax({
         url : 'calendar/refresh/'+month+'/'+year,
         method : "GET",
        }).done(function(res){
          $('#calendar').empty();
          $('#calendar').html(res);

          attachAgain();
        });
    }
    
    $('#datepicker').datepicker({
        dateFormat: "mm/yy",
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        onClose: function(dateText, inst) {

            function isDonePressed() {
                return ($('#ui-datepicker-div').html().indexOf('ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all ui-state-hover') > -1);
            }

            if (isDonePressed()) {
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, month, 1)).trigger('change');
                console.log('co the gui:'+month+"|"+year);
                month = parseInt(month)+1;
                year = parseInt(year);
                refreshCalendarWhenChoose(month,year);
                $('.date-picker').focusout() //Added to remove focus from datepicker input box on selecting date
            }
        },
        beforeShow: function(input, inst) {

            inst.dpDiv.addClass('month_year_datepicker')

            if ((datestr = $(this).val()).length > 0) {
                year = datestr.substring(datestr.length - 4, datestr.length);
                month = datestr.substring(0, 2);
                $(this).datepicker('option', 'defaultDate', new Date(year, month - 1, 1));
                $(this).datepicker('setDate', new Date(year, month - 1, 1));
                $(".ui-datepicker-calendar").hide();
            }
        }
    });


  function attachAgain()
  {
    contructData();
    var width_content = $('#calendar').width() - 175;
    $('.content-calendar').css('width', width_content);

     $('.content-calendar').scroll(function(e) {
        $('.sidebar-calendar').scrollTop($(this).scrollTop());
        $('.content-calendar thead')
            .animate({
                "marginTop": $(this).scrollTop() + "px"
            }, 0);
        $('.sidebar-calendar thead')
            .animate({
                "marginTop": $(this).scrollTop() + "px"
            }, 0);
    });

    $('.sidebar-calendar').scroll(function(e) {
        $('.content-calendar').scrollTop($(this).scrollTop());
        $('.sidebar-calendar thead')
            .animate({
                "marginTop": $(this).scrollTop() + "px"
            }, 0);
        $('.content-calendar thead')
            .animate({
                "marginTop": $(this).scrollTop() + "px"
            }, 0);
    });
    $('#datafullname').html($('.sidebar-calendar table tbody').html());
    $('#datacalendar').html($('.content-calendar table tbody').html());
  }

  attachAgain();

    $('#calendar').on('dblclick', '.item', function() {
        var val = $(this).text();
        $(this).attr('class', 'item1');
        $(this).html('<input type="text" value="' + val + '" style="z-index:10000;"/>');
        $(this).children('input').focus();
        $(this).focusout(function() {
            console.log('focusout');
            setData($(this).attr('idem'),$(this).attr('idday'),$(this).children('input').val());
            $(this).html($(this).children('input').val());
            $(this).unbind("focusout");
            $(this).attr('class', 'item');
        });
    });


    $('#search-name').keyup(function() {
        var textsearch = $(this).val();
        var htmlbuild = '';
        datasearch = [];

        var textsearch = $(this).val();
        $('#datafullname tr').each(function(key, value) {
            var text = $(value).find('.nameitem').text();
            if (text.toLowerCase().indexOf(textsearch.toLowerCase()) >= 0) {
                datasearch.push($(value).find('.nameitem').attr('idem'));
            }
            if(text.toLowerCase().indexOf(textsearch.toLowerCase()) >= 0 || $(this).hasClass("itemblank"))
            {
               htmlbuild += $("<div />").append($(this).clone()).html();
            }
        });
        $('.sidebar-calendar table tbody').html(htmlbuild);
        pullDataCalendar();
    });

    $('.savecalendar').click(function(){
      var JsonString = JSON.stringify(holdData);
      console.log(JsonString);
      $.ajax({
         url : 'calendar/save/'+time.month+'/'+time.year,
         method : 'POST',
         data : {
                 '_token' : '{{ csrf_token() }}',
                 data : JsonString
               },
         dataType: "json"
        }).done(function(res){

        });
    });
});
</script>