<style>
    #sidebar {
        width: 200px;
        transition: transform 0.3s ease;
        border-top-left-radius: 0.5rem;
        border-bottom-left-radius: 0.5rem;
    }
    #sidebar.collapsed {
        transform: translateX(100%);
    }
</style>

<aside id="sidebar" class="bg-gray-800 text-gray-300 p-4 fixed right-0 top-40 h-full collapsed">
    {{ $slot }}
</aside>

<script>
  const sidebar = document.getElementById('sidebar');
  const toggleButton = document.getElementById('toggleSidebar');
  const toggleIcon = document.getElementById('toggleIcon');

  toggleButton.addEventListener('click', () => {
      sidebar.classList.toggle('collapsed');
      toggleIcon.classList.toggle('rotate-90');
  });

  function toggleTasks(projectId) {
      const tasks = document.getElementById(projectId);
      tasks.classList.toggle('hidden');
  }
</script>