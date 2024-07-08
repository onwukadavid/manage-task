<div id="modal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-gray-100 p-8 rounded-lg shadow-lg">
      {{-- <button id="closeModalButton" class="absolute top-4 right-4 text-gray-600">&times;</button> --}}
      {{ $slot }}
    </div>
</div>

<script>
    document.getElementById('openModalButton').addEventListener('click', function() {
        document.getElementById('modal').classList.remove('hidden');
    });

    document.getElementById('closeModalButton').addEventListener('click', function() {
        document.getElementById('modal').classList.add('hidden');
    });

    // Optionally, close the modal when clicking outside of it
    document.getElementById('modal').addEventListener('click', function(event) {
        if (event.target === event.currentTarget) {
            document.getElementById('modal').classList.add('hidden');
        }
    });

    window.onload = function() {
        @if ($errors->any())
            document.getElementById('modal').classList.remove('hidden');
        @endif
    };
</script>