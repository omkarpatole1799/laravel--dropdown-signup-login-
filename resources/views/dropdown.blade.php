<h1>Dynamic dropdown</h1>

{{-- dropdown for selecting language --}}
<div>
    
    <label for="country">Select Country</label>

    <select id="country">
        <option value="Select language">--Select Country--</option>
        @foreach ($country as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
        @endforeach
    </select>
<br>

    <label for="states">Select State</label>
    <select id="state">
        {{-- <option value="Select language">--Select State--</option> --}}
    </select>

<br>

    <label for="city">Select City</label>
    <select id="city">
        {{-- <option value="Select language">--Select City--</option> --}}
    </select>
</div>


<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    {{-- <script src="../js/jQuery.js"></script> --}}

<script>
    jQuery(document).ready(function() {
        jQuery("#country").change(function() {
            let country_id = jQuery(this).val();
            // alert(country_id)
            jQuery.ajax({
                url:'/country',
                type: 'post',
                data: 'country='+country_id+'&_token={{ csrf_token() }}',
                success: function(result){
                    jQuery('#state').html(result);
                }
            })
            
        });

        jQuery("#state").change(function() {
            let city_id = jQuery(this).val();
            // alert(country_id)
            jQuery.ajax({
                url:'/city',
                type: 'post',
                data: 'city='+city_id+'&_token={{ csrf_token() }}',
                success: function(result){
                    jQuery('#city').html(result);
                }
            })
            
        });
    })
</script>
