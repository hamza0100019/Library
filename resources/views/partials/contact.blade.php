<section id="contact" class="why-maktabaty py-5" style="color: #264653;">
    <div class="container">
        <!-- En-tête de la section -->
        <div class="text-center mb-5">
            <h2 class="fw-bold display-5" style="color: #E76F51;">Contactez le support Maktabaty !</h2>
            <p class="lead text-muted">Besoin d'aide ? Envoyez-nous un message, et nous vous répondrons dans les plus brefs délais.</p>
        </div>

        <!-- Formulaire de contact -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="#" method="POST" class="p-4 shadow-sm rounded-3 bg-white">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Nom</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Votre nom complet" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Adresse Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Votre adresse email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label fw-bold">Message</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" placeholder="Expliquez-nous comment nous pouvons vous aider..." required>{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Bouton d'envoi -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-4" style="background-color: #E76F51; border-color: #E76F51;">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
