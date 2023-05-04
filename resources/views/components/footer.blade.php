<footer class="bg-gray-100 rounded-lg  dark:bg-gray-900">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <hr class="my-6 border-gray-300  sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="flex flex-col justify-center items-center sm:flex-row sm:items-center sm:justify-between">
            <a href="https://fema.edu.br/index.php/extensao/extensao-inova" target="_blank"
                class="flex items-center mb-4 sm:mb-0">
                <img src="{{ asset('img/hub.png') }}" class="hidden dark:block h-12 sm:h-16 mr-3" alt="Hub Inova Fema" />
                <img src="{{ asset('img/hub-dark.png') }}" class="dark:hidden  h-12 sm:h-16 mr-3"
                    alt="Hub Inova Fema" />
            </a>
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ date('Y') }} -
                Desenvolvido por Hub Inova Fema.</span>
        </div>
    </div>
</footer>
