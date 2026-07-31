<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body class="bg-slate-100 text-slate-800 flex h-screen overflow-hidden antialiased">

    <!-- [왼쪽] 메뉴 카테고리 사이드바 -->
    <aside class="w-60 bg-white flex flex-col border-r border-slate-200 shrink-0 shadow-sm">
        <!-- 로고 영역 -->
        <div class="p-5 border-b border-slate-100 flex items-center gap-2.5">
            <span class="w-7 h-7 rounded-lg bg-blue-600 text-white font-extrabold text-xs flex items-center justify-center shadow-sm">t</span>
            <span class="font-extrabold text-xl tracking-tight text-slate-900">table-order</span>
        </div>

        <!-- 카테고리 목록 -->
        <nav class="flex-1 p-3 space-y-1.5 overflow-y-auto">
            <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider px-3 pt-2 pb-1">LUNCH MENU</div>
            @foreach ($categories as $category)
            <a href="?category_id={{$category -> category_id}}" class="block px-3.5 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition">{{$category -> name}}</a>
            @endforeach
        </nav>

        <!-- 관리자 페이지 버튼 -->
        <div class="p-3 border-t border-slate-100">
            <a href="/admin"
                class="block w-full text-center px-3.5 py-2.5 rounded-xl text-sm font-bold text-white bg-slate-900 hover:bg-blue-600 transition">
                관리자 페이지
            </a>
        </div>
    </aside>

    <!-- [중앙] 음식 목록 영역 -->
    <main class="flex-1 p-6 overflow-y-auto bg-slate-50">
        <header class="mb-6 pb-3 border-b border-slate-200 flex justify-between items-end">
            <div>
                <h2 class="text-2xl font-extrabold text-slate-900">{{$selectedCategory -> name}}</h2>
                <p class="text-xs text-slate-500 mt-0.5">{{$selectedCategory -> name}} 메뉴입니다.</p>
            </div>
        </header>

        <!-- 음식 카드 그리드 -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($foods as $food)
            <div class="bg-white rounded-2xl p-5 flex flex-col items-center text-center relative border border-slate-200/80 shadow-sm hover:shadow-md transition">
                <!-- BEST 태그 -->
                <span class="absolute top-3.5 left-3.5 bg-rose-500 text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full shadow-sm">BEST</span>

                <!-- 이미지 영역 (밝은 배경) -->
                <div class="w-36 h-36 bg-slate-100 rounded-2xl flex items-center justify-center mb-4 mt-2">
                    <span class="text-slate-400 text-xs font-medium">이미지</span>
                </div>

                <!-- 음식 이름 -->
                <div class="text-base font-bold mb-1 text-slate-800">
                    {{ $food->name }}
                </div>

                <!-- 가격 -->
                <div class="text-lg font-black text-slate-900 mb-4">
                    {{ is_numeric($food->price) ? number_format($food->price) : $food->price }}원
                </div>

                <!-- 주문 버튼 -->
                <button type="button"
                    class="add-cart w-full bg-slate-900 hover:bg-blue-600 text-white font-bold py-2.5 rounded-xl text-sm active:scale-95 transition shadow-sm"
                    data-id="{{$food->food_id}}"
                    data-name="{{$food->name}}"
                    data-price="{{$food->price}}">
                    담기
                </button>
            </div>
            @endforeach
        </div>
    </main>

    <!-- [오른쪽] 장바구니 영역 -->
    <aside class="w-80 bg-white flex flex-col border-l border-slate-200 shrink-0 shadow-sm">
        <header class="p-5 border-b border-slate-100 flex justify-between items-center">
            <h2 class="font-extrabold text-lg text-slate-900">장바구니</h2>
            <button id="clear-cart" class="text-slate-400 text-xs hover:text-slate-600 font-medium underline">전체삭제</button>
        </header>

        <!-- 장바구니 아이템 리스트 -->
        <div id="cart-list" class="flex-1 p-4 space-y-3 overflow-y-auto bg-slate-50/50">
            <!-- 샘플 항목 1 -->
            <div class="bg-white p-4 rounded-xl relative border border-slate-200 shadow-sm">
                <button class="absolute top-3.5 right-3.5 text-slate-400 hover:text-slate-700 text-xs font-bold">✕</button>
                <div class="text-sm font-bold text-slate-800 mb-0.5">캐비어가츠산도(6pc)</div>
                <div class="text-xs text-slate-400 mb-3">기본</div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-1.5 bg-slate-100 p-1 rounded-lg">
                        <button class="w-6 h-6 rounded bg-white text-slate-700 text-xs flex items-center justify-center font-bold shadow-sm hover:bg-slate-50">-</button>
                        <span class="text-xs font-bold w-5 text-center text-slate-800">1</span>
                        <button class="w-6 h-6 rounded bg-white text-slate-700 text-xs flex items-center justify-center font-bold shadow-sm hover:bg-slate-50">+</button>
                    </div>
                    <span class="font-extrabold text-sm text-slate-900">103,000원</span>
                </div>
            </div>
        </div>

        <!-- 하단 결제 영역 -->
        <footer class="p-5 border-t border-slate-100 bg-white">
            <div class="flex justify-between items-center mb-4">
                <span class="text-sm font-medium text-slate-500">총 주문금액</span>
                <span id="cart-total" class="text-2xl font-black text-blue-600">0원</span>
            </div>
            <button id="order-submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 rounded-xl shadow-md transition active:scale-[0.98]">
                주문하기
            </button>
        </footer>
    </aside>

</body>

</html>