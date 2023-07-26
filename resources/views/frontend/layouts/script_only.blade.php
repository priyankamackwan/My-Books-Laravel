<script>
const token = $("meta[name='csrf-token']").attr("content");
$(document).ready(function() {
 
   current_url = getURL();
   var title;

      $.get(current_url, function( html ) {
           
            $('.gujrati-content').html(html);
           
            $("table tr").each(function () {
                  let category_collection = $(this).find('td:last-child').text();
                  let title = $(this).find('td:nth-child(2)').text();
                  let obj = $(this).find('td:nth-child(2)').find('a:first').attr('href');
                  
                  let page_link = 'https://gu.wikisource.org/wiki/'+title.replace(/ /g,"_");
                 
                  categoryAdd(category_collection, title, page_link);
                
            });

      });
});


function lessonAdd(course_id, lession_title, long_text){
      $.ajax({
            url: '{{ route('admin.lessons.store') }}',
            cache: false,
            type: "POST",
            data:{
                  "_token": token,
                  'course_id' : course_id,
                  'title': lession_title,
                  'long_text':long_text
            },
            success: function(responce){
                 console.log('lessonAdd');
                 
            },
            error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {} else {}
            }
      });
}

function categoryAdd(category_collection, title, page_link){

      $.ajax({
            url: '{{ route('admin.course-categories.store') }}',
            cache: false,
            type: "POST",
            data:{
                  "_token": token,
                  'category_name': category_collection,
            },
            success: function(responce){
                  let course_category_id = responce.id;
                  if((course_category_id)){
                        courseAdd(course_category_id, title, page_link);
                  }
                 
            },
            error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                  } else {}
            }
      });
}

function courseAdd(course_category_id, title, page_link){
     
      $.ajax({
            url: '{{ route('admin.courses.store') }}',
            cache: false,
            type: "POST",
            data:{
                  "_token": token,
                  'title': title,
                  'course_category_id': course_category_id,
                  'description':title
            },
            success: function(responce){
                  let course_id = responce.id;
                  if((course_id)){
                        $.get(page_link, function( html ) {
                              
                              let page_content = $('.mw-parser-output').html(html);
                              let content = page_content[0].innerHTML;
                              let lession_title = $('#firstHeading').text();
                              lessonAdd(course_id, title, content);

                        }); 
                  }
                 
            },
            error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) { } else {}
            }
      });
}

function getURL() {
      let url = "https://gu.wikisource.org/wiki/%E0%AA%B5%E0%AA%BF%E0%AA%95%E0%AA%BF%E0%AA%B8%E0%AB%8D%E0%AA%B0%E0%AB%8B%E0%AA%A4:%E0%AA%AA%E0%AB%81%E0%AA%B8%E0%AB%8D%E0%AA%A4%E0%AA%95%E0%AB%8B";
      let current =  "window.location.href";
      return url;
}



</script>