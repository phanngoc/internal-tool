  <script type="text/javascript">

    var ganttData;
    var ganttDataServer;


    function convert_datepicker_mysql(date)
    {
      month = date.substr(0,2);
      day = date.substr(3,2);
      year = date.substr(6,4);
      result = year+":"+month+":"+day+" 00:00:00";
      return result;
    }

    function convert_datepicker_gantt(date)
    {
      month = date.substr(0,2);
      day = date.substr(3,2);
      year = date.substr(6,4);
      result = new Date(year,month,day);
      return result;
    }

    function addbuttonaction()
    {
      $('.ganttview-vtheader').css({'margin-top':'0px'});
      $('.ganttview-vtheader').prepend('<div class="buttonaction" style="display:block;height:40px;"><div class="btnactionadd"><img src="{{ Asset('images/buttonadd.jpg')}}" width="32" height="32" /></div></div>');
      $('.btnactionadd').click(function(){

        $('#modal-add-feature').modal('show');

        $('body').on('focus','input[name="startDate"]', function(){
            $(this).datepicker();
        });
        $('body').on('focus','input[name="endDate"]', function(){
            $(this).datepicker();
        });
        var features = '<select class="choosefeature"><option disabled selected> -- select an option -- </option><option value="new">New</option>';
        $.each(ganttData,function(key,value){
           features += '<option value="'+value.id+'">'+value.name+'</option>';
        });
        features += '</select>';
        $('div.areaselectfeature').append(features);

        $('div.areaselectfeature').on('click','a.add',function(){
            console.log('fire may lan');
            var source   = $("#iteminput").html();
            var template = Handlebars.compile(source);
            var content = template();
            $('ul#list-add-detail-feature').append(content);
        });


        var idchoose = 0;
        var itemfeatureadd = {};
        itemfeatureadd.series = [];
        $('select.choosefeature').change(function(){
            $('#list-add-detail-feature').remove();
            $('input[name="addfeature"]').remove();
            $('.addfea').remove();
            idchoose = $(this).val();
            if($(this).val()=='new')
            {
              var html = '<input name="addfeature"/><a class="addfea">Add</a>';
              $('div.areaselectfeature').append(html);
              $('a.addfea').click(function(){
                itemfeatureadd.id = ganttData.length+1;
                itemfeatureadd.name = $('input[name="addfeature"]').val();
                var source   = $("#iteminput").html();
                var template = Handlebars.compile(source);
                var content = template({id : 0});
                var html = '<ul id="list-add-detail-feature">'+content+'</ul>';
                $('div.areaselectfeature').append(html);
                $('div.areaselectfeature').on('click','a.delete',function(){
                    $(this).parent().remove();
                });
              });
            }
            else
            {
              var source   = $("#iteminput").html();
              var template = Handlebars.compile(source);
              var content = template({id : 0});
              var html = '<ul id="list-add-detail-feature">'+content+'</ul>';
              $('div.areaselectfeature').append(html);
              $('div.areaselectfeature').on('click','a.delete',function(){
                  $(this).parent().remove();
              });
            }
        });//$('select.choosefeature').change(function(){

        $('.save_change_add_feature').click(function(){

          $('ul#list-add-detail-feature li').each(function(key,value){
              var name = $(value).find('input[name="item"]').val();
              var startDate = $(value).find('input[name="startDate"]').val();
              var endDate = $(value).find('input[name="endDate"]').val();
              var newItemDetail = {};
              newItemDetail.employees = [];
              newItemDetail.idparent = idchoose;
              newItemDetail.name = name;
              newItemDetail.start = convert_datepicker_gantt(startDate);
              newItemDetail.end = convert_datepicker_gantt(endDate);
              newItemDetail.startServer = convert_datepicker_mysql(startDate);
              newItemDetail.endServer = convert_datepicker_mysql(endDate);
              if(idchoose == 'new')
              {
                itemfeatureadd.series.push(newItemDetail);
              }
              else
              {
                ganttData[idchoose-1].series.push(newItemDetail);
              }

          });
          if(idchoose == 'new')
          {
              ganttData.push(itemfeatureadd)
          }
          loadGantt(ganttData);
          $('#modal-add-feature').modal('hide');
        });

      }); //$('.btnactionadd').click(function(){


    } // function addbuttonaction()

    $(document).ready(function(){
      $('#modal-add-feature').on('hidden.bs.modal',function(){
         $('div.areaselectfeature').off('click','a.add');
         $('.areaselectfeature').empty();
      });

      function setCurrentTimeForChooseTime(){
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(mm < 10) mm = '0' + mm;
        $('#datepickerchangegrantt').val(mm + '/' + yyyy);
      }
      // init now time for date choose.
      setCurrentTimeForChooseTime();

      function loadInit(id, datechoose)
      {
        console.log("id :"+id);
        // we need change select choose date.
        $('select#chooseproject').val(id).trigger('change');
        datechoose = typeof datechoose !== 'undefined' ? datechoose : '';
        datestart = '';
        dateend = '';
        if (datechoose == '') {
          var today = new Date();
          var dd = today.getDate();
          var mm = today.getMonth()+1; //January is 0!
          var yyyy = today.getFullYear();
          if(mm < 10) mm = '0' + mm;
          datestart = '?datestart=' + yyyy + '-' + mm + '-' + '00' + ' 00:00:00';
          if (mm == 12) {
            mm = "01";
            yyyy ++;
          } else {
            ++ mm;
          }
          if(mm < 10) mm = '0' + mm;
          dateend = '&dateend=' + yyyy + '-' + mm + '-' + '00' + ' 00:00:00';
        } else {
          // if have datechoose, default will have "0" prefix.
          var mm = datechoose.toString().substring(0,2);
          var yyyy = datechoose.toString().substring(3,7);
          datestart = '?datestart=' + yyyy + '-' + mm + '-' + '00' + ' 00:00:00';

          if (mm == 12) {
            mm = "01";
            yyyy ++;
          } else {
            ++ mm;
            // but after ++, it will lost "0" prefix.
            if(mm < 10) mm = '0' + mm;
          }

          dateend = '&dateend=' + yyyy + '-' + mm + '-' + '00' + ' 00:00:00';
        }

        console.log(datestart+"||"+dateend);

        $.ajax({
            url : '{{ URL::to("/") }}/manageproject/getTotalData/'+ id + datestart + dateend,
            type : 'GET',
            async: false,

        }).done(function(response){
            ganttData = JSON.parse(response);
            $.each(ganttData,function(kgantt1,vgantt1){
                $.each(vgantt1.series,function(kgantt2,vgantt2){
                  var year_start = parseInt(vgantt2.start.substring(0,4));
                  var month_start = parseInt(vgantt2.start.substring(5,7))-1;
                  var day_start = parseInt(vgantt2.start.substring(8,10));
                  var date_start = new Date(year_start,month_start,day_start);

                  ganttData[kgantt1].series[kgantt2].startServer = vgantt2.start;
                  ganttData[kgantt1].series[kgantt2].start = date_start;

                  var year_end = parseInt(vgantt2.end.substring(0,4));
                  var month_end = parseInt(vgantt2.end.substring(5,7))-1;
                  var day_end = parseInt(vgantt2.end.substring(8,10));
                  var date_end = new Date(year_end,month_end,day_end);

                  ganttData[kgantt1].series[kgantt2].endServer = vgantt2.end;
                  ganttData[kgantt1].series[kgantt2].end = date_end;
                });
            });
            ganttDataServer = ganttData;
            loadGantt(ganttData);

        });
      } // End loadInit()

      var paramIdUrl = {{ $projectId }};

      loadInit(paramIdUrl);

      $('#datepickerchangegrantt').datepicker({
          changeMonth: true,
          changeYear: true,
          showButtonPanel: true,
          dateFormat: 'mm/yy',
          onClose: function(dateText, inst) {
              $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
              $(this).trigger("change");
          }
      });

      $('#datepickerchangegrantt').change(function(){
        var datechoose = $(this).val();
        loadInit(paramIdUrl,datechoose);
      });

      // $('#tab_2').data('idProject',paramIdUrl);

      // $(".chooseproject").click(function() {
      //   var val = $('select#chooseproject').val();
      //   if ($('#tab_1').hasClass('active')) {
      //     window.location.replace("http://localhost/internal-tool/public/manageproject/"+val);
      //   } else {
      //     $('#tab_2').data('idProject',val);
      //   }
      //   var datechoose = $('#datepickerchangegrantt').val();
      //   loadInit(val,datechoose);
      // });

      // $('#chooseproject').select2();

      // $('.nav-tabs').find('li').click(function(){
      //   $("#ganttChart").removeAttr("style");
      //   var href = $(this).children('a').attr('href');
      //   console.log(href);
      //   if (href == "#tab_1") {
      //     $('select#chooseproject').val(paramIdUrl).trigger('change');
      //   } else {
      //     $('select#chooseproject').val($('#tab_2').data('idProject')).trigger('change');
      //   }
      // });

    });

    function loadGantt(ganttData)
    {
        $("#ganttChart").empty();
        (function ($) {
            $("#ganttChart").ganttView({
              data: ganttData,
              slideWidth: 750,
              behavior: {
                onClick: function (data) {

                },
                onResize: function (data) {
                  console.log(data);
                  var startDate = data.start.toString("yyyy-MM-dd");
                  var endDate = data.end.toString("yyyy-MM-dd");
                  var arr = ganttDataServer[data.idparent-1].series;
                  $.each(arr,function(key,value){
                    console.log(value.name+"|"+data.name);
                    if(value.name === data.name)
                    {
                      ganttData[data.idparent-1].series[key].startServer = startDate+" 00:00:00";
                      ganttData[data.idparent-1].series[key].endServer = endDate+" 00:00:00";
                      ganttData[data.idparent-1].series[key].start = data.start;
                      ganttData[data.idparent-1].series[key].end = data.end;
                    }
                  });
                },
                onDrag: function (data) {
                  var startDate = data.start.toString("yyyy-MM-dd");
                  var endDate = data.end.toString("yyyy-MM-dd");
                  var arr = ganttDataServer[data.idparent-1].series;
                  $.each(arr,function(key,value){
                    console.log(value.name+"|"+data.name);
                    if(value.name === data.name)
                    {
                      ganttData[data.idparent-1].series[key].startServer = startDate+" 00:00:00";
                      ganttData[data.idparent-1].series[key].endServer = endDate+" 00:00:00";
                      ganttData[data.idparent-1].series[key].start = data.start;
                      ganttData[data.idparent-1].series[key].end = data.end;
                    }
                  });
                }
              }
            });

        })(jQuery_1_4_2);

        addbuttonaction();

        $('.ganttview-vtheader-item-name').click(function(){
           $('#myModal').modal('show');
           $('input[name="feature"]').val($(this).text());
           $('input[name="feature"]').attr('paramindex',$(this).parent().index()-1);
        });
        $('.save_change_feature').click(function(){
           var val = $('input[name="feature"]').val();
           var index = $('input[name="feature"]').attr('paramindex');
           $('.ganttview-vtheader-item').eq(index).find('.ganttview-vtheader-item-name').text(val);
           $('#myModal').modal('hide');
           ganttDataServer[index].name = ganttData[index].name = val;
        });

        var key_detailfeature = 0;
        var key_sub_detailfeature = 0;
        $('.ganttview-vtheader-series-name').click(function(){
           $('#modal_detail_feature').modal('show');
           // o day phai -1 vi index no tinh them ca div co button add
           key_detailfeature = $(this).parent().parent().index()-1;
           key_sub_detailfeature = $(this).index();
           var id = ganttData[key_detailfeature].series[key_sub_detailfeature].id;
           $('input[name="feature-detail"]').val($(this).text());
           $.ajax({
              url : 'manageproject/getEmployee/'+id,
              type : 'GET',

           }).done(function(res){
              $('.content-detail-feature').html(res);
              $('.js-add-employee').select2({placeholder: "Please enter employee"});
           });

        })
        $('.save_change_detailfeature').click(function(){
           $('#modal_detail_feature').modal('hide');
           ganttData[key_detailfeature].series[key_sub_detailfeature].name = $('input[name="feature-detail"]').val();
           ganttDataServer[key_detailfeature].series[key_sub_detailfeature].name = $('input[name="feature-detail"]').val();
           console.log(key_detailfeature);
           // o day phai cong 1 vi
           $('.ganttview-vtheader-item').eq(key_detailfeature).find('.ganttview-vtheader-series-name').eq(key_sub_detailfeature).text($('input[name="feature-detail"]').val());
           var resem = [];
           $.each($('.js-add-employee').find(':selected'),function(key,value){
              resem.push($(value).val());
           });
           ganttData[key_detailfeature].series[key_sub_detailfeature].employees = resem;
           console.log(ganttData);
        });
        $('.delete_detailfeature').click(function(){
           $('#modal_detail_feature').modal('hide');

           ganttData[key_detailfeature].series.splice(key_sub_detailfeature,1);
           ganttDataServer[key_detailfeature].series.splice(key_sub_detailfeature,1);

           if(ganttData[key_detailfeature].series.length == 0)
           {
             ganttData.splice(key_detailfeature,1);
             ganttDataServer.splice(key_detailfeature,1);
           }
           loadGantt(ganttData);
        });

        $('.saveall').click(function(){
            $.ajax({
              url : 'manageproject/saveAll',
              data: { data : ganttData , _token :"{{csrf_token()}}" },
              type : 'POST',
            }).done(function(res){
               console.log(res);
            });
        });
     }

  </script>
