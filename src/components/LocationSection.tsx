import { MapPin, ExternalLink } from "lucide-react";
import { Button } from "./ui/button";

const MAPS_URL = "https://www.google.com/maps/search/?api=1&query=Smerek+79+Bieszczady";

export function LocationSection() {
  return (
    <section id="lokalizacja" className="section-padding">
      <div className="container-narrow mx-auto">
        <div className="text-center mb-12">
          <h2 className="font-display text-3xl md:text-4xl text-foreground mb-4">
            Lokalizacja
          </h2>
          <p className="text-muted-foreground text-lg max-w-2xl mx-auto">
            Spokojna okolica i świetna baza na szlaki
          </p>
        </div>

        <div className="card-warm overflow-hidden">
          <div className="grid md:grid-cols-2">
            {/* Map Placeholder */}
            <div className="relative aspect-[4/3] md:aspect-auto bg-secondary">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10347.94647543!2d22.45!3d49.18!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473c1a0e8e8e8e8e%3A0x8e8e8e8e8e8e8e8e!2sSmerek!5e0!3m2!1spl!2spl!4v1234567890"
                width="100%"
                height="100%"
                style={{ border: 0, minHeight: "300px" }}
                allowFullScreen
                loading="lazy"
                referrerPolicy="no-referrer-when-downgrade"
                title="Mapa lokalizacji"
                className="absolute inset-0"
              />
            </div>

            {/* Info */}
            <div className="p-8 md:p-12 flex flex-col justify-center">
              <div className="flex items-start gap-4 mb-6">
                <div className="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center shrink-0">
                  <MapPin className="w-6 h-6 text-primary" />
                </div>
                <div>
                  <h3 className="font-display text-xl text-foreground mb-1">
                    Smerek 79
                  </h3>
                  <p className="text-muted-foreground">
                    Bieszczady, województwo podkarpackie
                  </p>
                </div>
              </div>

              <div className="space-y-4 text-muted-foreground mb-8">
                <p>
                  Smerek to malownicza wioska u podnóża Połoniny Wetlińskiej. 
                  Idealne miejsce dla miłośników górskich wędrówek i ciszy.
                </p>
                <p>
                  W pobliżu szlaki na Połoninę Caryńską, Tarnicę i do Doliny Górnej Solinki. 
                  Doskonała baza wypadowa do poznawania Bieszczad.
                </p>
              </div>

              <Button asChild variant="outline" className="btn-outline-warm w-fit">
                <a href={MAPS_URL} target="_blank" rel="noopener noreferrer">
                  <ExternalLink className="w-4 h-4 mr-2" />
                  Otwórz w Google Maps
                </a>
              </Button>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
