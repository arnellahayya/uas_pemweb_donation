@extends('layouts.header')
@section('title', 'Tambah Donasi')

@section('content')
    <div class="d-flex justify-content-center">
        {{-- Pesan Sukses --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form class="form" action="{{ route('donasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card" id="card1">
                <span class="title">Tambah Donasi</span>
                <div class="group">
                    <input placeholder="" type="text" id="title" name="title" value="{{ old('title') }}" required />
                    <label for="title">Judul Donasi</label>
                    @if ($errors->has('title'))
                        <div class="error">{{ $errors->first('title') }}</div>
                    @endif
                </div>

                <div class="group">
                    <textarea placeholder="" id="description" name="description" rows="5" spellcheck="false">{{ old('description') }}</textarea>
                    <label for="description">Deskripsi</label>
                    @if ($errors->has('description'))
                        <div class="error">{{ $errors->first('description') }}</div>
                    @endif
                </div>

                <div class="group">
                    <input placeholder=" " type="text" id="target_amount" name="target_amount"
                        value="{{ old('target_amount') }}" required />
                    <label for="target_amount">Target Donasi</label>
                    @if ($errors->has('target_amount'))
                        <div class="error">{{ $errors->first('target_amount') }}</div>
                    @endif
                </div>

                <div class="group">
                    <select name="category" id="category" class="form-control custom-dropdown">
                        <option value="Banjir" {{ old('category') == 'Banjir' ? 'selected' : '' }}>Banjir</option>
                        <option value="Gempa" {{ old('category') == 'Gempa' ? 'selected' : '' }}>Gempa</option>
                        <option value="Lainnya" {{ old('category') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    <label for="category">Kategori</label>
                    @if ($errors->has('category'))
                        <div class="error">{{ $errors->first('category') }}</div>
                    @endif
                </div>

                <div class="group">
                    <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/jpg" class="form-control custom-dropdown">
                    <label for="image">Unggah Gambar</label>
                    @if ($errors->has('image'))
                        <div class="error">{{ $errors->first('image') }}</div>
                    @endif
                </div>
            </div>

            <div class="card" id="card2">
                <button type="submit" class="btn-submit"><span>Simpan</span></button>
            </div>
        </form>
    </div>

    <script>
        const targetAmountInput = document.getElementById("target_amount");
        targetAmountInput.addEventListener("input", function (e) {
            let value = this.value.replace(/[^0-9]/g, ""); // Hapus semua kecuali angka
            value = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 0,
            }).format(value); // Format menjadi mata uang Indonesia
            this.value = value.replace("Rp", "").trim(); // Hapus label "Rp" untuk input
        });
    </script>
    

    <style>
        .custom-dropdown {
        height: 50px; /* Atur tinggi dropdown */
        padding: 10px; /* Tambahkan padding agar lebih luas */
        font-size: 16px; /* Perbesar ukuran teks */
        border-radius: 5px; /* Tambahkan sedikit border radius untuk estetika */
        border: 1px solid rgba(0, 0, 0, 0.2); /* Atur warna border */
    }

    .custom-dropdown:focus {
        border-color: #3366cc; /* Warna border saat fokus */
        outline: none; /* Hilangkan outline bawaan */
    }

    /* Label tetap terlihat saat dropdown tinggi */
    .group label {
        position: absolute;
        top: -10px;
        left: 10px;
        padding: 0 5px;
        background-color: #fff;
        font-size: 14px;
        color: rgb(99, 102, 102);
    }
        .card {
            background-color: #fff;
            border-radius: 4px;
            padding: 20px;
            width: 400px;
            display: flex;
            flex-direction: column;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.096), 0 6px 30px rgba(0, 0, 0, 0.096);
        }

        #card1 {
            margin-bottom: 7px;
        }

        .title {
            font-size: 24px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 25px;
        }

        .form {
            margin-top: 15px;
            display: flex;
            flex-direction: column;
        }

        .group {
            position: relative;
            margin-bottom: 20px;
        }

        .group label {
            font-size: 14px;
            color: rgb(99, 102, 102);
            position: absolute;
            top: -10px;
            left: 10px;
            padding: 0 5px;
            background-color: #fff;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .form .group input,
        .form .group textarea,
        .form .group select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            outline: 0;
            width: 100%;
            background-color: transparent;
        }

        .form .group input:placeholder-shown+label,
        .form .group textarea:placeholder-shown+label {
            top: 10px;
            background-color: transparent;
        }

        .form .group input:focus,
        .form .group textarea:focus,
        .form .group select:focus {
            border-color: #3366cc;
        }

        .form .group input:focus+label,
        .form .group textarea:focus+label,
        .form .group select:focus+label {
            top: -10px;
            left: 10px;
            background-color: #fff;
            color: #3366cc;
            font-weight: 600;
            font-size: 14px;
        }

        .form .group textarea {
            resize: none;
            height: 100px;
        }

        .btn-submit {
            display: inline-block;
            border-radius: 8px;
            background-color: #2260ff;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 17px;
            padding: 16px;
            transition: all 0.5s;
            cursor: pointer;
            margin-top: 25px;
            width: 100%;
        }

        .btn-submit span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .btn-submit span:after {
            content: '»';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -15px;
            transition: 0.5s;
        }

        .btn-submit:hover span {
            padding-right: 15px;
        }

        .btn-submit:hover span:after {
            opacity: 1;
            right: 0;
        }
    </style>
@endsection
