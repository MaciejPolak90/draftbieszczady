import { useState } from "react";
import { Phone, MessageCircle, MessageSquare, Send, User, Calendar, Users, PawPrint } from "lucide-react";
import { Button } from "./ui/button";
import { Input } from "./ui/input";
import { Textarea } from "./ui/textarea";
import { Label } from "./ui/label";
import { Checkbox } from "./ui/checkbox";

const PHONE_NUMBER = "+48514995497";

export function ContactSection() {
  const [formData, setFormData] = useState({
    name: "",
    phone: "",
    dateFrom: "",
    dateTo: "",
    guests: "",
    hasPet: false,
    message: "",
  });

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    
    // Build WhatsApp message
    const petText = formData.hasPet ? "Tak, przyjeżdżamy ze zwierzęciem" : "Nie";
    const message = `Cześć! Chcę zarezerwować Bliźniak w Smereku.

Imię: ${formData.name}
Telefon: ${formData.phone}
Termin: ${formData.dateFrom} - ${formData.dateTo}
Liczba osób: ${formData.guests}
Zwierzę: ${petText}

${formData.message ? `Wiadomość: ${formData.message}` : ""}`;

    const whatsappUrl = `https://wa.me/48514995497?text=${encodeURIComponent(message)}`;
    window.open(whatsappUrl, "_blank");
  };

  return (
    <section id="kontakt" className="section-padding bg-cream">
      <div className="container-narrow mx-auto">
        <div className="text-center mb-12">
          <h2 className="font-display text-3xl md:text-4xl text-foreground mb-4">
            Sprawdź dostępność
          </h2>
          <p className="text-muted-foreground text-lg max-w-2xl mx-auto">
            Napisz ile osób i czy przyjeżdżacie z pupilem — odpowiemy z potwierdzeniem dostępności
          </p>
        </div>

        <div className="grid lg:grid-cols-5 gap-8">
          {/* Form */}
          <div className="lg:col-span-3 card-warm p-6 md:p-8">
            <form onSubmit={handleSubmit} className="space-y-6">
              <div className="grid sm:grid-cols-2 gap-4">
                <div className="space-y-2">
                  <Label htmlFor="name" className="flex items-center gap-2">
                    <User className="w-4 h-4 text-muted-foreground" />
                    Imię
                  </Label>
                  <Input
                    id="name"
                    placeholder="Jan"
                    value={formData.name}
                    onChange={(e) => setFormData({ ...formData, name: e.target.value })}
                    required
                    className="bg-background"
                  />
                </div>
                <div className="space-y-2">
                  <Label htmlFor="phone" className="flex items-center gap-2">
                    <Phone className="w-4 h-4 text-muted-foreground" />
                    Telefon
                  </Label>
                  <Input
                    id="phone"
                    type="tel"
                    placeholder="+48 123 456 789"
                    value={formData.phone}
                    onChange={(e) => setFormData({ ...formData, phone: e.target.value })}
                    required
                    className="bg-background"
                  />
                </div>
              </div>

              <div className="grid sm:grid-cols-2 gap-4">
                <div className="space-y-2">
                  <Label htmlFor="dateFrom" className="flex items-center gap-2">
                    <Calendar className="w-4 h-4 text-muted-foreground" />
                    Od
                  </Label>
                  <Input
                    id="dateFrom"
                    type="date"
                    value={formData.dateFrom}
                    onChange={(e) => setFormData({ ...formData, dateFrom: e.target.value })}
                    required
                    className="bg-background"
                  />
                </div>
                <div className="space-y-2">
                  <Label htmlFor="dateTo" className="flex items-center gap-2">
                    <Calendar className="w-4 h-4 text-muted-foreground" />
                    Do
                  </Label>
                  <Input
                    id="dateTo"
                    type="date"
                    value={formData.dateTo}
                    onChange={(e) => setFormData({ ...formData, dateTo: e.target.value })}
                    required
                    className="bg-background"
                  />
                </div>
              </div>

              <div className="grid sm:grid-cols-2 gap-4 items-end">
                <div className="space-y-2">
                  <Label htmlFor="guests" className="flex items-center gap-2">
                    <Users className="w-4 h-4 text-muted-foreground" />
                    Liczba osób
                  </Label>
                  <Input
                    id="guests"
                    type="number"
                    min="1"
                    max="7"
                    placeholder="np. 4"
                    value={formData.guests}
                    onChange={(e) => setFormData({ ...formData, guests: e.target.value })}
                    required
                    className="bg-background"
                  />
                </div>
                <div className="flex items-center gap-3 h-10">
                  <Checkbox
                    id="hasPet"
                    checked={formData.hasPet}
                    onCheckedChange={(checked) =>
                      setFormData({ ...formData, hasPet: checked as boolean })
                    }
                  />
                  <Label htmlFor="hasPet" className="flex items-center gap-2 cursor-pointer">
                    <PawPrint className="w-4 h-4 text-muted-foreground" />
                    Przyjeżdżam ze zwierzęciem
                  </Label>
                </div>
              </div>

              <div className="space-y-2">
                <Label htmlFor="message">Wiadomość (opcjonalnie)</Label>
                <Textarea
                  id="message"
                  placeholder="Dodatkowe pytania lub informacje..."
                  value={formData.message}
                  onChange={(e) => setFormData({ ...formData, message: e.target.value })}
                  className="bg-background min-h-[100px]"
                />
              </div>

              <Button type="submit" className="w-full btn-honey text-base py-6">
                <Send className="w-4 h-4 mr-2" />
                Wyślij zapytanie przez WhatsApp
              </Button>
            </form>
          </div>

          {/* Contact Info */}
          <div className="lg:col-span-2 space-y-6">
            <div className="card-warm p-6 md:p-8 text-center">
              <p className="text-muted-foreground mb-2">Zadzwoń lub napisz</p>
              <a
                href={`tel:${PHONE_NUMBER}`}
                className="font-display text-2xl md:text-3xl text-foreground hover:text-primary transition-colors block mb-6"
              >
                +48 514 995 497
              </a>

              <div className="space-y-3">
                <Button asChild className="w-full btn-honey">
                  <a href={`tel:${PHONE_NUMBER}`}>
                    <Phone className="w-4 h-4 mr-2" />
                    Zadzwoń
                  </a>
                </Button>
                <Button asChild variant="outline" className="w-full btn-outline-warm">
                  <a href="https://wa.me/48514995497" target="_blank" rel="noopener noreferrer">
                    <MessageCircle className="w-4 h-4 mr-2" />
                    WhatsApp
                  </a>
                </Button>
                <Button asChild variant="outline" className="w-full border-2 border-secondary text-secondary-foreground hover:bg-secondary">
                  <a href={`sms:${PHONE_NUMBER}`}>
                    <MessageSquare className="w-4 h-4 mr-2" />
                    SMS
                  </a>
                </Button>
              </div>
            </div>

            <div className="bg-secondary/50 rounded-xl p-6 text-center">
              <p className="text-sm text-muted-foreground">
                Odpowiadamy zazwyczaj w ciągu kilku godzin. 
                Jeśli zależy Ci na czasie — zadzwoń!
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
