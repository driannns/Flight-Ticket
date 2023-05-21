<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
</head>

<body>
    <div class="px-32 relative"
        style="background-image: url('/assets/wallpapers.jpg'); height: 60vh; background-position: top;">
        <nav>
            <div class="flex items-center text-xl font-bold text-[#E8AA42]">
                <img src="/assets/logo.png" alt="Logo of Flight Ticket" class="w-20">
                <div>
                    <h1>Flight</h1>
                    <h1>Ticket <span>Direct</span></h1>
                </div>
            </div>
        </nav>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full px-32">
            <div class="text-[#E8AA42] text-center">
                <p class="text-4xl font-bold">Best Priced Flight Ticket</p>
                <p>Simple Booking. Easy Savings.</p>
            </div>
            <!-- <div class="w-full h-10 mt-10 bg-white rounded-lg">

            </div> -->
        </div>
    </div>
    <div class="bg-gray-50 px-10 py-10">
        @foreach($ticket as $index => $tickets)
        <div
            class="w-6/12 bg-white my-3 mx-auto shadow-lg p-4 flex rounded-xl border-2 transition-all hover:border-[#ff5e1f]">
            <div class="w-9/12">
                <div class="flex items-center gap-2">
                    <i class='bx bxs-plane-alt text-xl'></i>
                    <h5 class="font-bold">{{ $tickets->airline }}</h5>
                </div>
                <div class="my-5 flex gap-x-16 items-center">
                    <div class="text-center w-fit flex flex-col gap-2">
                        <i class="fa-solid fa-plane-departure text-2xl" style="color: #ff5b1f;"></i>
                        <p class="font-medium">{{ $formattedScheduledTimes[$index] }}</p>
                        <p class="bg-gray-200 rounded-3xl w-fit px-2 py-1">{{ $tickets->departure_code }}</p>
                    </div>
                    <div class="text-center w-fit">
                        <p class="font-medium">{{ $tickets->duration }}</p>
                    </div>
                    <div class="text-center w-fit flex flex-col gap-2">
                        <i class="fa-solid fa-plane-arrival text-2xl" style="color: #ff5e1f;"></i>
                        <p class="font-medium">{{ $formattedEstimatedTimes[$index] }}</p>
                        <p class="bg-gray-200 rounded-3xl w-fit px-2 py-1">{{ $tickets->arrival_code }}</p>
                    </div>
                </div>
            </div>
            <div class="border-l -my-2 mr-4"></div>
            <div class="w-3/12 flex flex-col justify-center">
                <p class="font-bold"><span class="text-2xl text-[#ff5e1f]">@currency($tickets->price)</span>/org</p>
                <p>{{ $tickets->class }}</p>
            </div>
        </div>
        @endforeach
        <div class="w-1/2 mx-auto">
            <p>{{ $ticket->links('vendor.pagination.tailwind') }}</p>
        </div>
    </div>
</body>

</html>
