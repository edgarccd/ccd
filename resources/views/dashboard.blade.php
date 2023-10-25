<x-app-layout>
    <br>
    <div class="container" style="margin:auto;text-align:center;padding: 15px;box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.3);border-radius: 25px;background-color: whitesmoke;">
    Bienvenido!   
    <h3>{{ Auth::user()->name }}</h3>
    </div>
</x-app-layout>