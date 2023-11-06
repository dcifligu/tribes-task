<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/9ef0b1bc57.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.css" defer>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    @vite('resources/css/app.css')
    @livewireStyles
    @livewireScripts

</head>

<body>

    <div class="flex justify-center" id="alert_message">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <livewire:task-form-pop-up />
    <livewire:user-side-panel />
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <livewire:dashboard-header />
        <div class="container items-center px-4 py-8 m-auto mt-5">
            <livewire:show-tasks :userId="$user->id" />
        </div>


        <div class="flex flex-col mt-8 w-11/12 m-auto">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <livewire:tasks-table :userId="auth()->user()->id" />
            </div>
        </div>



    </div>
</body>


<script>
    //Search Functionality
    const searchInput = document.getElementById('searchInput');
    const rows = document.querySelectorAll('table tbody tr');

    searchInput.addEventListener('input', function() {
        const searchText = this.value.toLowerCase();

        rows.forEach(row => {
            const cells = row.querySelectorAll('td');

            let found = false;

            cells.forEach(cell => {
                if (cell.textContent.toLowerCase().includes(searchText)) {
                    found = true;
                }
            });

            row.style.display = found ? 'table-row' : 'none';
        });
    });
    setTimeout(function() {
        document.getElementById('alert_message').style.display = 'none';
    }, 5000);
</script>


</html>
