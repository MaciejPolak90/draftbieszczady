import { Check, Phone, AlertCircle } from "lucide-react";
import { Button } from "./ui/button";

const PHONE_NUMBER = "+48514995497";

const included = [
  "Wi-Fi",
  "Parking",
  "Pościel i ręczniki",
  "Drewno do kominka",
  "Środki czystości",
];

const rules = [
  "Rezerwacja tylko przez telefon, SMS lub WhatsApp",
  "Zaliczka przy rezerwacji",
];

export function PricingSection() {
  return (
    <section id="cennik" className="section-padding bg-cream">
      <div className="container-narrow mx-auto">
        <div className="text-center mb-12">
          <h2 className="font-display text-3xl md:text-4xl text-foreground mb-4">
            Cennik i zasady
          </h2>
        </div>

        <div className="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
          {/* Pricing Card */}
          <div className="card-warm p-8 text-center relative overflow-hidden">
            <div className="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-primary to-honey-dark" />
            
            <div className="mb-6">
              <span className="text-muted-foreground text-lg">cena za dobę</span>
              <div className="flex items-baseline justify-center gap-1 mt-2">
                <span className="font-display text-5xl md:text-6xl text-foreground">450</span>
                <span className="text-2xl text-muted-foreground">zł</span>
              </div>
              <p className="text-muted-foreground mt-2">za całą połówkę domu</p>
            </div>

            <div className="border-t border-border pt-6 mb-6">
              <p className="font-medium text-foreground mb-4">W cenie:</p>
              <ul className="space-y-2">
                {included.map((item) => (
                  <li key={item} className="flex items-center gap-2 text-muted-foreground">
                    <Check className="w-5 h-5 text-forest shrink-0" />
                    {item}
                  </li>
                ))}
              </ul>
            </div>

            <div className="border-t border-border pt-6">
              <p className="text-foreground mb-2">
                <strong>Pojemność:</strong> do 5 osób
              </p>
              <p className="text-muted-foreground text-sm">
                + 2 osoby na narożniku w salonie
              </p>
            </div>
          </div>

          {/* Rules Card */}
          <div className="card-warm p-8">
            <div className="flex items-center gap-3 mb-6">
              <AlertCircle className="w-6 h-6 text-primary" />
              <h3 className="font-display text-xl text-foreground">Zasady rezerwacji</h3>
            </div>

            <ul className="space-y-4 mb-8">
              {rules.map((rule) => (
                <li key={rule} className="flex items-start gap-3 text-muted-foreground">
                  <span className="w-1.5 h-1.5 rounded-full bg-primary mt-2 shrink-0" />
                  {rule}
                </li>
              ))}
            </ul>

            <div className="bg-secondary/50 rounded-xl p-4 mb-6">
              <p className="text-sm text-muted-foreground">
                <strong className="text-foreground">Nie używamy Booking ani Airbnb.</strong>{" "}
                Kontaktuj się z nami bezpośrednio — odpowiadamy szybko!
              </p>
            </div>

            <Button asChild className="w-full btn-honey">
              <a href={`tel:${PHONE_NUMBER}`}>
                <Phone className="w-4 h-4 mr-2" />
                Zadzwoń i zarezerwuj
              </a>
            </Button>
          </div>
        </div>
      </div>
    </section>
  );
}
