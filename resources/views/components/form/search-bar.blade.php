<div>
  <div class="relative mt-2 rounded-md shadow-sm">
    <x-form.input type="text" name="search" id="search" placeholder="johndoe@gmail" class="w-full pr-20" />
    <div class="absolute inset-y-0 right-0 flex items-center m-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
        <circle cx="11" cy="11" r="8"></circle>
        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
      </svg>                          
    </div>
    <ul id="search-results" class="absolute bg-white rounded-md border border-gray-300 w-full mt-1 hidden z-10"></ul>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('#search').on('input', function() {
        let query = $(this).val();
        
        if(query.length > 2) {
            $.ajax({
                url: '{{ route("search-user") }}',
                type: 'GET',
                data: { query: query },
                success: function(data) {
                    $('#search-results').empty().removeClass('hidden');

                    if (data.length > 0) {
                        $.each(data, function(index, user) {
                            $('#search-results').append('<li class="p-2 cursor-pointer hover:bg-gray-200" data-email="' + user.email + '">' + user.email + '</li>');
                        });
                    } else {
                        $('#search-results').append('<li class="p-2 text-gray-500">No results found</li>');
                    }
                }
            });
        } else {
            $('#search-results').empty().addClass('hidden');
        }
    });

    $(document).on('click', '#search-results li', function() {
        $('#search').val($(this).data('email'));
        $('#search-results').empty().addClass('hidden');
    });
});
</script>
