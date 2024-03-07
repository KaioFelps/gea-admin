<header class="w-full px-6 py-3 bg-blue-600 flex flex-row items-center justify-between">
    <h1 class="text-white font-black text-2xl uppercase select-none">Gea HK</h1>

    <button
        id="user-dropdown-target"
        class="
        px-3 py-1.5 rounded-lg border border-white/25 flex items-center justify-center gap-4 text-sm text-white font-bold transition-all cursor-default
        hover:bg-white/5
        active:bg-white/10
        "
    >
        <img src="{{ asset("images/pixelated-id.png") }}" alt="carteira de identidade em pixel arte">

        {{ $user->nickname }}
    </button>

    @push("floatings")
    <div
        role="dropdown"
        id="user-dropdown"
        style="opacity:0;pointer-events:none;"
        class="bg-gray-900 shadow-[0_0_0_1px_inset] shadow-white/10 p-2 rounded-lg absolute top-0 left-0 w-40 transition-all"
    >
        <div class="px-2 pt-1 pb-2 mb-2 border-black border-b text-sm font-regular text-white">
            {{$user->pontos}} pontos da GeA
        </div>

        <a
            href="{{route("session.logout")}}"
            class="
            rounded-lg px-3 py-1 bg-white/10 flex flex-row gap-3 items-center text-sm font-bold text-white w-full transition-all cursor-default
            hover:bg-white/15
            active:bg-white/20
            outline-0 outline-white/5
            focus:outline-4
            "
        >
            <img src="{{ asset("images/logout-icon.png") }}" alt="pessoa em pixel arte saindo pela porta">
            Deslogar
        </a>
    </div>
    @endpush

    @push("scripts")
    <script type="module">    
        const button = document.getElementById("user-dropdown-target");
        const content = document.getElementById("user-dropdown");

        const { computePosition, shift, flip, offset, hide } = window.floating;

        function roundByDPR(value) {
            const dpr = window.devicePixelRatio || 1;
            return Math.round(value * dpr) / dpr;
        }

        async function updateDropdown(subY) {
            const {middlewareData, ...calculatedPos} = await computePosition(button, content, {
                placement: "bottom-end",
                middleware: [
                    flip(),
                    shift({ padding: 12 }),
                    offset((8)),
                    hide(),
                ]
            });

            const sumToY = subY ? subY : 0;
            
            Object.assign(content.style, {
                top: 0,
                left: 0,
                transform: `translate3d(${roundByDPR(calculatedPos.x)}px,${roundByDPR(calculatedPos.y) + sumToY}px,0)`,
            })

            if (middlewareData.hide) {
                Object.assign(content.style, {
                    visibility: middlewareData.hide.referenceHidden
                    ? 'hidden'
                    : 'visible',
                })
            }
        }

        async function handleToggleDropdown() {
            const isVisible = content.style.opacity === "1";
            
            if (isVisible) {
                await updateDropdown(-10);
                content.style.opacity = "0";
                content.style.pointerEvents = "none";
            } else {
                content.style.opacity = "1";
                content.style.pointerEvents = "auto";
                await updateDropdown();
            }
        }

        const observer = new ResizeObserver(async (entries) => {
            const isVisible = content.style.opacity === "1";
            
            if (isVisible) {
                await updateDropdown();
            }
        })

        observer.observe(document.body);

        window.addEventListener("DOMContentLoaded", async () => {
            await updateDropdown(-10);
        })

        button.addEventListener("click", handleToggleDropdown);
    </script>
    @endpush
</header>
