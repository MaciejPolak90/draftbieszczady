import {
  Accordion,
  AccordionContent,
  AccordionItem,
  AccordionTrigger,
} from "@/components/ui/accordion";

const faqs = [
  {
    question: "Czy zwierzęta są akceptowane?",
    answer:
      "Tak! Zwierzęta są u nas mile widziane. Rozumiemy, że pupil to członek rodziny. Prosimy tylko o informację przy rezerwacji.",
  },
  {
    question: "Ile osób może nocować?",
    answer:
      "Dom pomieści komfortowo do 5 osób (2 pokoje na piętrze). Dodatkowo 2 osoby mogą spać na rozkładanym narożniku w salonie — razem max. 7 osób.",
  },
  {
    question: "Czy jest Wi-Fi i parking?",
    answer:
      "Tak, bezprzewodowy internet oraz prywatne miejsce parkingowe są w cenie pobytu.",
  },
  {
    question: "Czy są 2 łazienki?",
    answer:
      "Tak, w domu znajdują się 2 pełne łazienki z prysznicem i ogrzewaniem. Dla rodziny z dziećmi to ogromna wygoda!",
  },
  {
    question: "Jak zarezerwować pobyt?",
    answer:
      "Rezerwujemy tylko bezpośrednio — przez telefon, SMS lub WhatsApp. Nie korzystamy z Booking ani Airbnb. Zadzwoń lub napisz na +48 514 995 497.",
  },
];

export function FAQSection() {
  return (
    <section className="section-padding">
      <div className="container-narrow mx-auto max-w-3xl">
        <div className="text-center mb-12">
          <h2 className="font-display text-3xl md:text-4xl text-foreground mb-4">
            Często zadawane pytania
          </h2>
        </div>

        <Accordion type="single" collapsible className="space-y-4">
          {faqs.map((faq, index) => (
            <AccordionItem
              key={index}
              value={`item-${index}`}
              className="card-warm px-6 border-0"
            >
              <AccordionTrigger className="text-left font-display text-lg hover:no-underline hover:text-primary py-5">
                {faq.question}
              </AccordionTrigger>
              <AccordionContent className="text-muted-foreground pb-5 text-base">
                {faq.answer}
              </AccordionContent>
            </AccordionItem>
          ))}
        </Accordion>
      </div>
    </section>
  );
}
