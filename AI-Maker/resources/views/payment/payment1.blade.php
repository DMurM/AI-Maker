<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>
    <form action="{{ route('process.payment') }}" method="POST" id="payment-form">
        @csrf
        <div class="form-row">
            <label for="card-element">
                Tarjeta de crédito o débito
            </label>
            <div id="card-element">
                <!-- Un Stripe Element será insertado aquí -->
            </div>
            <!-- Muestra errores de validación de la tarjeta -->
            <div id="card-errors" role="alert"></div>
        </div>
        <button type="submit">Pagar</button>
    </form>

    <script>
        // Your publishable key
        var stripe = Stripe('{{ env("STRIPE_KEY") }}');
        var elements = stripe.elements();

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        // Crear un elemento de tarjeta (esto incluye el número de tarjeta, fecha de caducidad y CVC)
        var card = elements.create('card', { style: style });

        // Montar el elemento de tarjeta en el DOM
        card.mount('#card-element');

        card.on('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Enviar el token al servidor
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Envía el token de Stripe al servidor
        function stripeTokenHandler(token) {
            // Inserta el token en el formulario
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Envía el formulario
            form.submit();
        }
    </script>
</body>

</html>