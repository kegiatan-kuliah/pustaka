<tr>
  <td>{{ $data->title }}</td>
  <td>{{ html()->input('number', 'quantity[$data->id][]')
    ->class('form-control')->attribute('required', true)
    ->attribute('placeholder', 'Isikan Jumlah')
    ->attribute('min', 1)
  }}</td>
</tr>