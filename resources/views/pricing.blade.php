<x-layout>
    You have to pay for this
    <form action={{ route('pay') }} method=POST>
        @csrf
        @method('PATCH')
        <button type="submit">Pay now</button>
    </form>
</x-layout>