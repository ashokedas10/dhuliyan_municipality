<style type="text/css">
    #autoSuggestionsList > li {
         background: none repeat scroll 0 0 #F3F3F3;
         border-bottom: 1px solid #E3E3E3;
         list-style: none outside none;
         padding: 3px 15px 3px 15px;
         text-align: left;
    }
    #autoSuggestionsList > li a { color: #800000; }
    .auto_list {
         border: 1px solid #E3E3E3;
         border-radius: 5px 5px 5px 5px;
         position: absolute;
    }
</style>
<script type="text/javascript">
        function ajaxSearch() {
            var input_data = $('#search_data').val();
            if (input_data.length === 0) {
                $('#suggestions').hide();
            } else {

                var post_data = {
                    'search_data': input_data,
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>domain/autocomplete/",
                    data: post_data,
                    success: function(data) {
                        // return success
                        if (data.length > 0) {
                            $('#suggestions').show();
                            $('#autoSuggestionsList').addClass('auto_list');
                            $('#autoSuggestionsList').html(data);
                        }
                    }
                });

            }
        }
</script>
<div class="something">
     <input name="search_data" id="search_data" type="text" onkeyup="ajaxSearch();">
        <div id="suggestions">
            <div id="autoSuggestionsList">  
            </div>
        </div>
</div>