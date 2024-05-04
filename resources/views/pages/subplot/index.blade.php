@extends('layouts.app')

@section('content')
    <h1 class="my-4">Data Hutan Sekunder</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No Plot</th>
                    <th scope="col">Serapan CO2 (Ton C/Ha)</th>
                    <th scope="col">Total Berat Masa Pucuk</th>
                    <th scope="col">Berat Biomassa Akar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>79.91</td>
                    <td>418.66</td>
                    <td>585.49</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>-</td>
                    <td>0.00</td>
                    <td>0.00</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>-</td>
                    <td>0.00</td>
                    <td>0.00</td>
                </tr>
                <tr>
                    <th scope="row">Total</th>
                    <td>-</td>
                    <td>-</td>
                    <td>216.63</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
