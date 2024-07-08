<div id="notification" class="fixed top-0 right-0 m-4 p-4 w-1/4 bg-green-500 text-white rounded-lg shadow-lg opacity-0 transition-opacity duration-500 ease-in-out">
    {{ $slot }}
</div>

<script>
        // Show notification
        const notification = document.getElementById('notification');
        notification.classList.remove('opacity-0');
        notification.classList.add('opacity-100');
        
        // Hide the notification after 3 seconds
        setTimeout(function() {
            notification.classList.remove('opacity-100');
            notification.classList.add('opacity-0');
        }, 3000);
</script>