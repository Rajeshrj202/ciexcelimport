

     $(document).ready(function(){
      var i = 1;

      // DataTable
      $('#reportsdata').DataTable({
         dom: 'Blfrtip',
         processing: true,
         serverSide: true,
         paging:true,
         
         buttons: [
                {
                extend: 'copy'
                },
                {
                extend: 'csv',footer:true,
                title:"InstallationDetails",
                },
                {
                extend: 'excel',footer:true,
                title:"InstallationDetails"
                }
            ],
         ajax: BASEURL+"/ajax/get-installation-list",
         aoColumns: [
            {
               data : 'installation_id',
            },
            {  
               data : 'date',
               "bSortable": false,
               "render": function (data) { return '<span style="display:none;">'+getTimeStamp(data)+'</span>'+CustomDateFormat(data);}
                
            },
            {data : 'seal' },
            {data : 'installed_at' },
            {data : 'type' },
            {data : 'use' },
            {data : 'client' },
            {
              data: function(item) {
                
                return '<a type="button" class="btn btn-default" href='+BASEURL+'excel/view/'+item.unique_id+'><div class="icon-shape icon-xs icon-shape-success rounded"><svg class="icon " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg></div></a>';
              }
            }
            
          ]
      });



    });

     function CustomDateFormat(date)
     {
      var d = new Date(date);

      var curr_date = d.getDate();

      var curr_month = d.getMonth();

      var curr_year = d.getFullYear();

      if(curr_month<10) { curr_month='0'+curr_month.toString() }
      if(curr_date<10) { curr_date = '0'+curr_date.toString() }

      return curr_date+"-"+curr_month+"-"+curr_year;

     }

     function getTimeStamp(date) {

      var d = new Date(date);

      var curr_date = d.getDate();

      var curr_month = d.getMonth();

      var curr_year = d.getFullYear();

      return curr_year.toString()+curr_month.toString()+curr_date.toString();
    }

  
