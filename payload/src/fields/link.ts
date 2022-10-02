import { Field } from "payload/types";

export const linkFields: Field[] = [
  {
    name: 'type',
    type: 'radio',
    label: 'Link Type',
    defaultValue: 'reference',
    options: [
      {
        label: 'Link to another document',
        value: 'reference',
      },
      {
        label: 'Custom URL',
        value: 'custom',
      }
    ]
  },
  {
    name: 'url',
    label: 'URL',
    type: 'text',
    required: true,
    admin: {
      condition: (_, siblingData) => siblingData.type === 'custom',
    }
  },
  {
    name: 'reference',
    type: 'relationship',
    label: 'Document to link to',
    relationTo: ['pages', 'posts'],
    admin: {
      condition: (_, siblingData) => siblingData.type === 'reference',
    }
  },
]