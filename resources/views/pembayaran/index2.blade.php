@extends('layouts.app')

@section('title', '| Pembayaran Kedua')  

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/img.css') }}">
@endsection 

@section('content')
    <div class="row">
        <h1>Pembayaran Paket Wedding</h1>
        <table style="margin-top:50px;">
            
            <tr>
                <th>ID Booking</th>
                <td>&nbsp&nbsp:&nbsp&nbsp </td>
                <td> {{ $bookings->id }}</td>
            </tr>
            <tr>
                <th>Nama Pembooking</th>
                <td>&nbsp&nbsp:&nbsp&nbsp </td>
                <td> {{ $bookings->pembooking }}</td>
            </tr>
            <tr>
                <th>Tempat</th>
                <td>&nbsp&nbsp:&nbsp&nbsp </td>
                <td> {{ $bookings->tempats->nama }}</td>
            </tr>
            <tr>
                <th>Jenis Paket</th>
                <td>&nbsp&nbsp:&nbsp&nbsp </td>
                <td> {{ $bookings->packages->jenis_paket }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>&nbsp&nbsp:&nbsp&nbsp </td>
                <td> {{ $bookings->status }}</td>
            </tr>
            <tr>
                <th>Tanggal Acara</th>
                <td>&nbsp&nbsp:&nbsp&nbsp </td>
                <td> {{ $bookings->tgl_acara }}</td>
            </tr>

        </table>    
    </div>
    
    <div style="margin-top:40px"></div>

    @if(empty($bookings->pembayarans2->cicil2))
    <div class="row">
        <p>NB : Untuk pembayaran bisa melalui rekening dibawah ini <br>
        <strong>Bank BNI     : 4321-456789</strong><br>
        <strong>Bank Mandiri : 4321-456789</strong><br>
        <strong>Bank BRI     : 4321-456789</strong><br>
        <strong>Bank BTN     : 4321-456789</strong><br>
        </p>
        <table>
            <thead></thead>
        </table>
    </div>

        
        <h3>Pembayaran Cicilan Kedua</h3>
         
         {!! Form::open(['route' => ['pembayaran2.store', $bookings->id], 'method' => 'POST', 'files' => TRUE])  !!}
           
            {{ Form::label('nominal', 'Nominal : ') }}
            {{ Form::number('nominal', null, ['class' => 'form-control']) }}

            {{ Form::label('image', 'Foto Bukti Transfer : ') }}
            {{ Form::file('image') }}

            {{ Form::submit('Submit', ['class' => 'btn btn-danger', 'style' => 'margin-top:20px; margin-bottom:50px;']) }}

        {!! Form::close() !!}
        

    @else
        <h3>Cicilan Kedua</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Bukti Transfer</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Nominal</th>
                    <?php 
                        $jumlah = ($bookings->pembayarans->cicil1+$bookings->pembayarans2->cicil2);

                    ?>    
                    @if($jumlah == $bookings->packages->harga)
                    @else
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img id="myImg" src="{{ asset('pembayaran/'. $bookings->pembayarans2->bukti2) }}" height="200px;"></td>
                    <td>{{ date('j M Y', strtotime($bookings->pembayarans2->tgl2)) }}</td>
                    <td>{{ $bookings->pembayarans2->cicil2 }}</td>
                    <?php 
                        $jumlah = ($bookings->pembayarans->cicil1+$bookings->pembayarans2->cicil2);
                        
                    ?>    
                    @if($jumlah == $bookings->packages->harga)
                    @else
                    <td><a href="{{ route('pembayaran2.edit', $bookings->pembayarans2->id) }}" class="btn btn-info">Edit</a></td>
                    @endif    
                </tr>
                <tr>
                   <td></td>
                   <th>Keterangan</th>
                   <th>
                        <?php 
                            $jumlah = ($bookings->pembayarans->cicil1+$bookings->pembayarans2->cicil2);  
                        ?>
                       @if($jumlah==$bookings->packages->harga)
                            <p style="color:red">Lunas</p>
                        @else
                            <p style="color:blue">Belum Lunas</p>
                       @endif     
                   </th> 
                </tr>
            </tbody>
        </table>
        <!-- The Modal -->
        <div id="myModal" class="modal row" >
          <span class="close">&times;</span>
          <img class="modal-content" id="img01">
          <div id="caption"></div>
        </div>
    @endif
@endsection

@section('scripts')
    <script type="text/javascript">
        
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
        modal.style.display = "none";
    }
    </script>
@endsection
