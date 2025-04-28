@extends('layouts.member')

@section('content')
<div class="container">
    <div class="bg-yellow-500 p-6 shadow-md">
        <h1>Member Registrasi</h1>
        <p>Mohon lengkapi data Anda terlebih dahulu untuk melengkapi pendaftaran anggota!</p>
    </div>
    
    <div class="bg-green-100 p-6 shadow-md mt-10">

        <form action="{{ route('member.postmember') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ $user->name }}" required>
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Telepon</label>
                <input type="text" name="phone" id="phone" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ $user->phone }}" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ $user->email }}" required>
            </div>
            <div class="mb-4">
                <label for="division" class="block text-sm font-medium text-gray-700">Bidang</label>
                <select name="division" id="division" class="mt-1 block w-full border-gray-300 rounded-md" required>
                    <option value="">Pilih Bidang</option>
                    @foreach ($divisions as $division)
                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4">
                <label for="province" class="block text-sm font-medium text-gray-700">Provinsi</label>
                <select name="province" id="province" data-target="city" class="mt-1 block w-full border-gray-300 rounded-md"  onchange="selectedProvince(this)"  required>
                    <option value="">Pilih Provinsi</option>
                    @foreach ($provinces as $province)
                    <option value="{{ $province->code }}">{{ $province->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="city" class="block text-sm font-medium text-gray-700">Kab/Kota</label>
                <select name="city" id="city" class="mt-1 block w-full border-gray-300 rounded-md" required>
                    <option value="">Pilih Kab/Kota</option>
                    @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea name="address" id="address" class="mt-1 block w-full border-gray-300 rounded-md" required></textarea>
            </div>
            
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Keterangan (Opsional)</label>
                <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    const selectedProvince = (el) => {
        const token  = "{{ csrf_token() }}";
        const target = el.getAttribute('data-target');

        fetch('/api/city', {
            method: 'POST',
            headers: {
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({"id": el.value, "_token": token})
        }).then(res => res.json())
        .then(res => {
            const data = res.data;
            let opt = '';
            data.map((o, i) => {
                opt += '<option value="'+o.id+'">'+o.name+'</option>';
            })

            document.getElementById(target).innerHTML = opt;
        });
    }
</script>
@endsection