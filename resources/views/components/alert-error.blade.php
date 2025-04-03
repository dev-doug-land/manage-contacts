@if ($errors->any())
    <div id="error-message" class="bg-red-500 text-white p-3 rounded mb-4 max-w-2xl mx-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-center">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <script>
        setTimeout(() => {
            document.getElementById('error-message')?.remove();
        }, 5000);
    </script>
@endif