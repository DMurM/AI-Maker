<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" href="{{ asset('css/payment1.css') }}">
</head>

<body>
    <div class="container">
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
            <div class="form-row">
                <label for="credits">
                    Cantidad de créditos
                </label>
                <input type="number" id="credits" name="credits" min="1" required>
                <span id="euros">0.00 EUR</span>
            </div>
            <button type="submit">Pagar</button>
        </form>
    </div>

    <!-- Success/Failure Modal -->
    <div id="paymentModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modal-message"></p>
        </div>
    </div>

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

        // Pasar el valor de PHP a JavaScript
        var coinRate = {{ $coinRate }};

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
            var credits = document.getElementById('credits').value;

            fetch('{{ route("process.payment") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    stripeToken: token.id,
                    credits: credits
                })
            })
                .then(response => response.json())
                .then(data => {
                    showModal(data.success ? 'Pago exitoso!' : 'Pago fallido: ' + data.message);
                })
                .catch(error => {
                    showModal('Error: ' + error.message);
                });
        }

        function showModal(message) {
            var modal = document.getElementById("paymentModal");
            var span = document.getElementsByClassName("close")[0];
            var modalMessage = document.getElementById("modal-message");

            modalMessage.textContent = message;
            modal.style.display = "block";

            span.onclick = function () {
                modal.style.display = "none";
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }

        document.getElementById('credits').addEventListener('input', function () {
            var credits = this.value;
            var euros = (credits * coinRate).toFixed(2);
            document.getElementById('euros').textContent = euros + ' EUR';
        });
    </script>
</body>

</html>