<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <title>Travel App</title>

    </head>
    <body>
        <div id="app">
            <App></App>
        </div>
            
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            $(document).ready(function(){
                $("#selected-category").on('change', async function () {
                    const response = await fetch('/venues?category='+$(this).val()+'&city='+$("#selected-city").val());
                    const data = await response.json();
                    let content = `<table class="table">
                                        <thead>
                                            <tr>
                                                <th>Location Name</th>
                                                <th>Venue Type</th>
                                                <th>Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>`;
                    data.data.venues.forEach(element => {
                        content += `<tr><td>${element.name}</td><td>${element.categories[0].name}</td><td><${element.location.formattedAddress.join(" ")}</td></tr>`;
                    });
                    if(data.data.venues.length == 0)
                    {
                        content += `<tr colspan="3" style="text-align : center">No Records Found</tr>`
                    }
                    content += `</tbody></table>`;
                    $("#places-body").empty();
                    $("#places-body").append(content);

                })
            });
        </script>
    </body>
</html>
