<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body class="bg-slate-100 text-slate-800 min-h-screen antialiased">

    <div class="max-w-5xl mx-auto p-6">

        <h1 class="text-3xl font-bold mb-6">
            주문 조회
        </h1>

        <div class="space-y-4">

            @forelse($orders as $order)

                <div class="bg-white rounded-xl shadow p-5">

                    <div class="flex justify-between items-center mb-4">

                        <div>
                            <h2 class="text-xl font-bold">
                                테이블 {{ $order->table_number }}
                            </h2>

                            <p class="text-sm text-gray-500">
                                주문번호 : {{ $order->order_id }}
                            </p>
                        </div>

                        <span class="px-3 py-1 rounded-full text-sm
                            @if($order->status === 'completed')
                                bg-green-100 text-green-700
                            @elseif($order->status === 'cooking')
                                bg-yellow-100 text-yellow-700
                            @else
                                bg-gray-100 text-gray-700
                            @endif
                        ">
                            {{ $order->status }}
                        </span>

                    </div>


                    <div class="border-t pt-4">

                        <h3 class="font-semibold mb-2">
                            주문 메뉴
                        </h3>


                        <ul class="space-y-2">

                            @foreach($order->orderItems as $item)

                                <li class="flex justify-between">

                                    <span>
                                        {{ $item->food->name }}
                                        <span class="text-gray-500">
                                            x {{ $item->quantity }}
                                        </span>
                                    </span>

                                    <span>
                                        {{ number_format($item->food->price * $item->quantity) }}원
                                    </span>

                                </li>

                            @endforeach

                        </ul>

                    </div>


                    <div class="mt-4 text-right font-bold text-lg">

                        총 금액 :
                        {{ number_format(
                            $order->orderItems->sum(fn($item) => $item->food->price * $item->quantity)
                        ) }}원

                    </div>


                </div>


            @empty

                <div class="bg-white rounded-xl p-10 text-center text-gray-500">
                    주문 내역이 없습니다.
                </div>

            @endforelse

        </div>

    </div>

</body>

</html>